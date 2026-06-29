<?php

define('MBG', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/functions-new.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/Discourse/functions.discourse.php');

DIRECT_ACCESS_BLOCKED();

$html_output = '';

if (!empty($identification)) {
    $userId = isset($_POST['userId']) ? sanitize($_POST['userId']) : '';
    $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
    $limit = 5;

    // Hardcoded sample notifications matching post details
    $sample_notifications = [
        [
            'id' => 101,
            'message' => 'Ravi Joshi liked your post "The silent revolution in edge AI — why on-device inference is changing everything".',
            'created_at' => date('Y-m-d H:i:s', strtotime('-15 minutes')),
            'application' => 'Discourse',
            'link' => '/Discourse/posts/index.php?id=1',
            'image' => '/Discourse/assets/images/catalina.webp',
            'seen' => false
        ],
        [
            'id' => 102,
            'message' => 'Sofia Karim left a comment on your post: "This is a game changer! On-device inference..."',
            'created_at' => date('Y-m-d H:i:s', strtotime('-1 hour')),
            'application' => 'Discourse',
            'link' => '/Discourse/posts/index.php?id=1',
            'image' => 'https://ui-avatars.com/api/?name=Sofia+Karim&background=f3f4f6&color=d97706&rounded=true',
            'seen' => false
        ],
        [
            'id' => 103,
            'message' => 'You were mentioned in a new topic "Web Development Trends" by Marco Torres.',
            'created_at' => date('Y-m-d H:i:s', strtotime('-1 day')),
            'application' => 'Discourse',
            'link' => '/Discourse/posts/index.php?id=5',
            'image' => '/Discourse/assets/images/catalina.webp',
            'seen' => true
        ],
        [
            'id' => 104,
            'message' => 'A new announcement has been posted in c/FEU TECH DEV: "Midterm Exam schedules and room assignments".',
            'created_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
            'application' => 'Discourse',
            'link' => '/Discourse/index.php',
            'image' => '/Discourse/assets/images/Discourse-logo.png',
            'seen' => true
        ],
        [
            'id' => 105,
            'message' => 'Your topic "No-grade-penalty mental health leave policy" has reached 10 upvotes.',
            'created_at' => date('Y-m-d H:i:s', strtotime('-3 days')),
            'application' => 'Discourse',
            'link' => '/Discourse/posts/index.php?id=3',
            'image' => '/Discourse/assets/images/anonymous.png',
            'seen' => true
        ]
    ];

    // Filter notifications based on pagination offset
    $slice = array_slice($sample_notifications, $offset, $limit);

    foreach ($slice as $ROW) {
        $read_class = ($ROW['seen'] == false) ? "bg-light-primary" : "bg-hover-secondary";
        $reaction = null;
        $app = "<span class='text-primary fw-bolder'>{$ROW['application']}</span> · ";
        $link = $ROW['link'];
        $message = $ROW['message'];
        $timestamp = date('F j, Y, g:i a', strtotime($ROW['created_at']));
        $image = $ROW['image'];

        $html_output .= "
                <a href='{$link}' class='notification-item col-12 border-top p-0' data-id='{$ROW['id']}'>
                    <div class='{$read_class} px-8 py-5'>
                        <div class='d-flex align-items-start'>
                            <div class='d-block'>
                                <div class='w-40px h-40px bgi-no-repeat bgi-position-center bgi-size-cover bg-dark rounded position-relative' style='background-image: url(&quot;{$image}&quot;);'>
                                    {$reaction}
                                </div>
                            </div>
                            <div class='ms-4'>
                                <p class='ellipsis-3 mb-1 text-gray-800'>{$message}</p>
                                <p class='mb-0 small'>
                                    {$app}
                                    <span class='text-gray-600'>{$timestamp}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            ";
    }
}

echo $html_output;
?>