<?php
// Discourse-specific database connection and helper functions

session_name('mbg');
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// ── Database connection variables set to null for mock mode ──
$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'discourse';

$EDITH = null;
$conn = null;

// Compatibility variables
$DB_SERVER   = $DB_HOST;
$DB_USERNAME = $DB_USER;
$DB_PASSWORD = $DB_PASS;
$DB_NAME_EDITH  = $DB_NAME;

// Define Identification Global (simulating logged in user or using session)
if (!isset($_SESSION['identification'])) {
    $_SESSION['identification'] = 'T202110117'; // Default: Marielle Basanes
}
$identification = $_SESSION['identification'];

// Helper Class for Sanitization (legacy compatibility)
if (!class_exists('Sanitizer')) {
    class Sanitizer {
      public static function url($url) {
        return filter_var($url, FILTER_SANITIZE_URL);
      }
    }
}

// Clean sanitization function for SQL input (no-op since no SQL queries)
if (!function_exists('sanitize')) {
    function sanitize($data) {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = sanitize($value);
            }
            return $data;
        }
        if (is_string($data)) {
            return trim($data);
        }
        return $data;
    }
}

// Core Auth & Access Functions
if (!function_exists('IS_LOGGED_IN')) {
    function IS_LOGGED_IN($uri) {
      if (!isset($_SESSION['identification'])) {
        header("Location: /Discourse/index.php");
        exit();
      }
    }
}

if (!function_exists('DIRECT_ACCESS_BLOCKED')) {
    function DIRECT_ACCESS_BLOCKED() {
      if (!defined('MBG')) {
        die("Direct access blocked.");
      }
    }
}

/* Account details */
if (!function_exists('GET_ACCOUNT_DETAILS')) {
    function GET_ACCOUNT_DETAILS($id) {
      /* Fallback mock */
      $id_clean = trim($id);
      if ($id_clean === 'T202210344') {
          return [
              'identification' => 'T202210344',
              'display_name' => 'Sofia Karim',
              'role' => 'student',
              'avatar_md' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150',
              'email' => 'sofia@example.com'
          ];
      } elseif ($id_clean === 'T202102837') {
          return [
              'identification' => 'T202102837',
              'display_name' => 'Marco Torres',
              'role' => 'student',
              'avatar_md' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=150',
              'email' => 'marco@example.com'
          ];
      } elseif ($id_clean === 'T202210202') {
          return [
              'identification' => 'T202210202',
              'display_name' => 'Catalina Smith',
              'role' => 'student',
              'avatar_md' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150',
              'email' => 'catalina@example.com'
          ];
      } elseif ($id_clean === 'T202110117') {
          return [
              'identification' => 'T202110117',
              'display_name' => 'Marielle Basanes',
              'role' => 'student',
              'avatar_md' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150',
              'email' => 'marielle@example.com'
          ];
      } else {
          return [
              'identification' => $id_clean,
              'display_name' => 'User ' . $id_clean,
              'role' => 'student',
              'avatar_md' => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=150',
              'email' => ''
          ];
      }
    }
}

// Fetch Account Info for current logged in user
$ACCOUNT = GET_ACCOUNT_DETAILS($identification);

if (!function_exists('DISPLAY_NAME')) {
    function DISPLAY_NAME($account) {
      return $account['display_name'] ?? 'User';
    }
}

if (!function_exists('getUserClassification')) {
    function getUserClassification($id) {
      $account = GET_ACCOUNT_DETAILS($id);
      if ($account && $account['role'] === 'admin') {
          return 'Associate';
      }
      return 'Student';
    }
}

if (!function_exists('respondWithError')) {
    function respondWithError($message) {
      header('Content-Type: application/json');
      echo json_encode(['status' => 'error', 'message' => $message]);
      exit();
    }
}

if (!function_exists('getUserAvatar')) {
    function getUserAvatar($id, $size = "MD") {
      $account = GET_ACCOUNT_DETAILS($id);
      return !empty($account['avatar_md']) ? $account['avatar_md'] : '/Discourse/assets/images/anonymous.png';
    }
}

// Asset Base Path
$BASE_PATH = "/Discourse";

if (!function_exists('getLightColorStyle')) {
    function getLightColorStyle($hex) {
        if (empty($hex)) $hex = '#1A8B44';
        $hex = str_replace('#', '', $hex);
        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2) ?: '0');
            $g = hexdec(substr($hex, 2, 2) ?: '0');
            $b = hexdec(substr($hex, 4, 2) ?: '0');
        }
        return "background-color: rgba($r, $g, $b, 0.1) !important; color: #$hex !important;";
    }
}

if (!function_exists('sort_discourse_posts')) {
    function sort_discourse_posts($posts, $criteria) {
        $sorted = $posts;
        if ($criteria === 'new') {
            usort($sorted, function($a, $b) {
                return strtotime($b['created_at'] ?? 'now') - strtotime($a['created_at'] ?? 'now');
            });
        } elseif ($criteria === 'top') {
            usort($sorted, function($a, $b) {
                $score_a = ($a['upvotes'] ?? 0) - ($a['downvotes'] ?? 0);
                $score_b = ($b['upvotes'] ?? 0) - ($b['downvotes'] ?? 0);
                return $score_b - $score_a;
            });
        } elseif ($criteria === 'rising') {
            usort($sorted, function($a, $b) {
                $now = time();
                $age_a = max(1, ($now - strtotime($a['created_at'] ?? 'now')) / 3600);
                $age_b = max(1, ($now - strtotime($b['created_at'] ?? 'now')) / 3600);
                $score_a = (($a['comment_count'] ?? 0) * 3 + ($a['upvotes'] ?? 0)) / pow($age_a + 2, 1.2);
                $score_b = (($b['comment_count'] ?? 0) * 3 + ($b['upvotes'] ?? 0)) / pow($age_b + 2, 1.2);
                if ($score_a == $score_b) return 0;
                return ($score_b > $score_a) ? 1 : -1;
            });
        } else { // 'hot'
            usort($sorted, function($a, $b) {
                $now = time();
                $age_a = max(1, ($now - strtotime($a['created_at'] ?? 'now')) / 3600);
                $age_b = max(1, ($now - strtotime($b['created_at'] ?? 'now')) / 3600);
                $score_a = (($a['upvotes'] ?? 0) - ($a['downvotes'] ?? 0) + ($a['comment_count'] ?? 0) * 2) / pow($age_a + 2, 1.5);
                $score_b = (($b['upvotes'] ?? 0) - ($b['downvotes'] ?? 0) + ($b['comment_count'] ?? 0) * 2) / pow($age_b + 2, 1.5);
                if ($score_a == $score_b) return 0;
                return ($score_b > $score_a) ? 1 : -1;
            });
        }
        return $sorted;
    }
}

if (!function_exists('get_relative_time')) {
    function get_relative_time($datetime) {
        $time = strtotime($datetime);
        if (!$time) return '1d ago';
        $now = time();
        $diff = $now - $time;
        if ($diff < 60) {
            return 'Just now';
        }
        $diff = round($diff / 60);
        if ($diff < 60) {
            return $diff . 'm ago';
        }
        $diff = round($diff / 60);
        if ($diff < 24) {
            return $diff . 'h ago';
        }
        $diff = round($diff / 24);
        if ($diff < 30) {
            return $diff . 'd ago';
        }
        return date('F j, Y', $time);
    }
}

if (!function_exists('getCategoryBadgeStyle')) {
  function getCategoryBadgeStyle($category)
  {
    $cat = strtoupper(trim($category));
    switch ($cat) {
      case 'ANNOUNCEMENT':
        return ['class' => 'badge-light-success',  'icon' => 'bi-megaphone',         'icon_color' => 'text-success'];
      case 'TECHNOLOGY':
        return ['class' => 'badge-light-primary',  'icon' => 'bi-cpu',               'icon_color' => 'text-primary'];
      case 'CULTURE':
        return ['class' => 'badge-light-danger',   'icon' => 'bi-palette',           'icon_color' => 'text-danger'];
      case 'GAMING':
        return ['class' => 'badge-light-warning',  'icon' => 'bi-controller',        'icon_color' => 'text-warning'];
      case 'FEU':
        return ['class' => 'badge-light-warning',  'icon' => 'bi-building',          'icon_color' => 'text-warning'];
      case 'IDEAS':
        return ['class' => 'badge-light-info',     'icon' => 'bi-lightbulb',         'icon_color' => 'text-info'];
      case 'CREATIVE':
        return ['class' => 'badge-light-primary',  'icon' => 'bi-stars',             'icon_color' => 'text-primary'];
      case 'SCIENCE':
        return ['class' => 'badge-light-info',     'icon' => 'bi-droplet-half',      'icon_color' => 'text-info'];
      case 'NEWS':
        return ['class' => 'badge-light-danger',   'icon' => 'bi-newspaper',         'icon_color' => 'text-danger'];
      case 'AI':
        return ['class' => 'badge-light-success',  'icon' => 'bi-robot',             'icon_color' => 'text-success'];
      case 'ACADEMICS':
        return ['class' => 'badge-light-warning',  'icon' => 'bi-book',              'icon_color' => 'text-warning'];
      case 'LIFESTYLE':
        return ['class' => 'badge-light-info',     'icon' => 'bi-emoji-smile',       'icon_color' => 'text-info'];
      case 'ENTERTAINMENT':
        return ['class' => 'badge-light-primary',  'icon' => 'bi-film',              'icon_color' => 'text-primary'];
      case 'MUSIC':
        return ['class' => 'badge-light-danger',   'icon' => 'bi-music-note',        'icon_color' => 'text-danger'];
      case 'POLITICS':
        return ['class' => 'badge-light-dark',     'icon' => 'bi-megaphone',         'icon_color' => 'text-dark'];
      case 'ISSUES':
        return ['class' => 'badge-light-danger',   'icon' => 'bi-exclamation-circle', 'icon_color' => 'text-danger'];
      case 'SPORTS':
        return ['class' => 'badge-light-warning',  'icon' => 'bi-trophy',            'icon_color' => 'text-warning'];
      default:
        // Try case-insensitive substring matches
        if (stripos($cat, 'TECH') !== false) {
          return ['class' => 'badge-light-primary',  'icon' => 'bi-cpu',               'icon_color' => 'text-primary'];
        } elseif (stripos($cat, 'ACAD') !== false) {
          return ['class' => 'badge-light-warning',  'icon' => 'bi-book',              'icon_color' => 'text-warning'];
        } elseif (stripos($cat, 'SPORT') !== false) {
          return ['class' => 'badge-light-warning',  'icon' => 'bi-trophy',            'icon_color' => 'text-warning'];
        } elseif (stripos($cat, 'LIFE') !== false) {
          return ['class' => 'badge-light-info',     'icon' => 'bi-emoji-smile',       'icon_color' => 'text-info'];
        } else {
          return ['class' => 'badge-light-secondary', 'icon' => 'bi-tag',               'icon_color' => 'text-secondary'];
        }
    }
  }
}

if (!function_exists('getCommunityIconDetails')) {
  function getCommunityIconDetails($name, $category = null)
  {
    $name_lower = strtolower($name);

    // Default: FEU Tech — matches sidebar: bg-light-success text-success, bi-cpu
    $icon       = "bi-cpu";
    $bg_class   = "bg-light-success";
    $text_class = "text-success";

    if (strpos($name_lower, 'life') !== false) {
      // FEU Life — matches sidebar: bg-light-danger text-danger, bi-heart-fill
      $icon       = "bi-heart-fill";
      $bg_class   = "bg-light-danger";
      $text_class = "text-danger";
    } elseif (strpos($name_lower, 'culture') !== false || strpos($name_lower, 'hub') !== false) {
      // CultureHub — matches sidebar: bg-light-primary text-primary, bi-music-note-beamed
      $icon       = "bi-music-note-beamed";
      $bg_class   = "bg-light-primary";
      $text_class = "text-primary";
    } elseif (strpos($name_lower, 'fresh') !== false || strpos($name_lower, 'study') !== false || strpos($name_lower, 'group') !== false) {
      $icon       = "bi-people-fill";
      $bg_class   = "bg-light-info";
      $text_class = "text-info";
    } elseif (strpos($name_lower, 'food') !== false || strpos($name_lower, 'trip') !== false) {
      $icon       = "bi-cup-hot-fill";
      $bg_class   = "bg-light-warning";
      $text_class = "text-warning";
    } elseif (strpos($name_lower, 'cosplay') !== false || strpos($name_lower, 'artist') !== false) {
      $icon       = "bi-palette-fill";
      $bg_class   = "bg-light-primary";
      $text_class = "text-primary";
    } elseif (strpos($name_lower, 'enroll') !== false || strpos($name_lower, 'thesis') !== false || strpos($name_lower, 'advice') !== false) {
      $icon       = "bi-journal-bookmark-fill";
      $bg_class   = "bg-light-warning";
      $text_class = "text-warning";
    } elseif (strpos($name_lower, 'innovat') !== false) {
      $icon       = "bi-lightbulb-fill";
      $bg_class   = "bg-light-warning";
      $text_class = "text-warning";
    } elseif (strpos($name_lower, 'alabang') !== false) {
      $icon       = "bi-building-fill";
      $bg_class   = "bg-light-warning";
      $text_class = "text-warning";
    } elseif (strpos($name_lower, 'diliman') !== false) {
      $icon       = "bi-mortarboard-fill";
      $bg_class   = "bg-light-info";
      $text_class = "text-info";
    }

    return [
      'icon'       => $icon,
      'bg_class'   => $bg_class,
      'text_class' => $text_class,
      // keep hex keys as empty so old code doesn't break
      'bg_hex'     => '',
      'color_hex'  => '',
    ];
  }
}

if (!function_exists('renderCategoryBadge')) {
    function renderCategoryBadge($category) {
        $badge = getCategoryBadgeStyle($category);
        return '<span class="badge ' . $badge['class'] . ' rounded-pill px-3 py-2 fs-8 fw-bold">' .
               htmlspecialchars($category) . '</span>';
    }
}

if (!function_exists('IS_COMMUNITY_MEMBER')) {
    function IS_COMMUNITY_MEMBER($community_title, $identification) {
        // Fallback: check session
        if (isset($_SESSION['joined_communities']) && is_array($_SESSION['joined_communities'])) {
            return in_array($community_title, $_SESSION['joined_communities']);
        }
        return false;
    }
}

if (!function_exists('IS_POST_SAVED')) {
    function IS_POST_SAVED($post_id, $identification) {
        // Fallback: check session
        if (isset($_SESSION['saved_posts']) && is_array($_SESSION['saved_posts'])) {
            return in_array($post_id, $_SESSION['saved_posts']);
        }
        return false;
    }
}

if (!function_exists('renderTopicBadge')) {
    function renderTopicBadge($topic) {
        if (empty($topic)) return '';
        if (!function_exists('getCategoryBadgeStyle')) return '';
        $badge = getCategoryBadgeStyle(strtoupper(trim($topic)));
        $label = strtoupper(trim($topic));
        $url   = '/Discourse/topics/index.php?t=' . urlencode($label);
        return '<a href="' . $url . '" class="badge ' . $badge['class'] . ' rounded-pill px-3 py-2 fs-8 fw-bold text-decoration-none me-1">'
             . htmlspecialchars($label)
             . '</a>';
    }
}

if (!function_exists('renderHashtagBadges')) {
    function renderHashtagBadges($tags_raw, $limit = 4) {
        if (empty($tags_raw)) return '';
        // Split by comma or bullet separator
        $tags = preg_split('/[,•]+/', $tags_raw);
        $html = '';
        $count = 0;
        foreach ($tags as $t) {
            $t = trim($t);
            if ($t === '') continue;
            $url = '/Discourse/hashtags/index.php?tag=' . urlencode($t);
            $html .= '<a href="' . $url . '" class="badge rounded-pill px-2 py-1 fs-9 fw-semibold text-decoration-none text-muted" '
                   . 'style="background:#f1f3f4;border:1px solid #e0e0e0;" '
                   . 'onmouseover="this.style.background=\'#e8ede9\'" onmouseout="this.style.background=\'#f1f3f4\'">'
                   . '#' . htmlspecialchars(strtolower($t))
                   . '</a> ';
            if (++$count >= $limit) break;
        }
        return $html;
    }
}

if (!function_exists('MIGRATE_POST_HASHTAGS')) {
    function MIGRATE_POST_HASHTAGS($post_id, $tags_raw) {
        // No-op / Hardcoded mode
        return;
    }
}

if (!function_exists('linkHashtags')) {
    function linkHashtags($text) {
        if (empty($text)) return '';
        return preg_replace_callback(
            '/(<[^>]*>)|(?<![a-zA-Z0-9&])#([a-zA-Z0-9_]+)/i',
            function($matches) {
                // If it matched an HTML tag (Group 1 is not empty), return the whole tag unmodified
                if (!empty($matches[1])) {
                    return $matches[1];
                }
                $tag = $matches[2];
                if (is_numeric($tag)) {
                    return $matches[0];
                }
                $url = '/Discourse/hashtags/index.php?tag=' . urlencode(strtolower($tag));
                return '<a href="' . $url . '" class="text-primary text-decoration-none fw-semibold">#' . htmlspecialchars($tag) . '</a>';
            },
            $text
        );
    }
}
