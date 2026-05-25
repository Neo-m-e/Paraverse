
  <!-- ── Widget 1: Discourse Info Card ──────────────────────── -->
<div class="card discourse-info-card mt-12 mb-4 border-0 position-relative overflow-hidden rounded-4 shadow-sm">
    <div class="discourse-widget-center-glow position-absolute w-100 h-100 top-0 start-0 pointer-events-none"></div>
  
  <div class="card-body p-4 d-flex flex-column justify-content-between h-100 position-relative z-index-1">
    
    <div class="d-flex align-items-center gap-2 mb-2">
      <img src="assets/images/Discourse-logo.png" alt="Discourse Logo" class="discourse-sidebar-logo" />
    </div>
    
    <p class="discourse-info-desc text-white opacity-75 fs-7 fw-normal lh-base mb-3">
      Ask questions, start debates, post anonymously. No prof. No judgment. Just FEU Tech students keeping it real.
    </p>
    
    <div class="discourse-info-posts d-flex flex-column gap-1 border-top border-white-10 pt-2 flex-grow-1">
      
      <a href="/Discourse/pages/view/view-post-poll.php" class="discourse-info-post-item d-flex align-items-start gap-2 p-2 rounded text-decoration-none transition-all">
        <span class="discourse-info-post-icon fs-7 mt-1">📊</span>
        <div class="discourse-info-post-text d-flex flex-column">
          <span class="discourse-info-post-title text-white fs-7 fw-semibold lh-sm text-line-clamp-2">
            Poll: How do you actually study for finals?...
          </span>
          <span class="discourse-info-post-meta text-white opacity-50 fs-8 mt-0.5">just posted</span>
        </div>
      </a>
      
      <a href="/Discourse/pages/view/view-post-tech.php" class="discourse-info-post-item d-flex align-items-start gap-2 p-2 rounded text-decoration-none transition-all">
        <span class="discourse-info-post-icon fs-7 mt-1">🔵</span>
        <div class="discourse-info-post-text d-flex flex-column">
          <span class="discourse-info-post-title text-white fs-7 fw-semibold lh-sm text-line-clamp-2">
            The silent revolution in edge AI — why on-device inference is changing everything
          </span>
          <span class="discourse-info-post-meta text-white opacity-50 fs-8 mt-0.5">3 comments · most active</span>
        </div>
      </a>
      
      <a href="/Discourse/pages/view/view-post-sample.php" class="discourse-info-post-item d-flex align-items-start gap-2 p-2 rounded text-decoration-none transition-all">
        <span class="discourse-info-post-icon fs-7 mt-1">💡</span>
        <div class="discourse-info-post-text d-flex flex-column">
          <span class="discourse-info-post-title text-white fs-7 fw-semibold lh-sm text-line-clamp-2">
            What if community governance used ranked-choice weighted by stake, not by account age?
          </span>
          <span class="discourse-info-post-meta text-white opacity-50 fs-8 mt-0.5">no replies yet</span>
        </div>
      </a>
      
    </div>
  </div>
</div>

  <!-- ── Widget 2: Community Stats ──────────────────────────── -->
  <div class="card discourse-stats-card mb-4">
    <div class="card-body p-4">
      <h6 class="discourse-widget-title mb-3">Community Stats</h6>
      <div class="discourse-stats-grid">
        <div class="discourse-stat-item">
          <div class="discourse-stat-icon">
            <i class="bi bi-people-fill"></i>
          </div>
          <div class="discourse-stat-body">
            <span class="discourse-stat-label">MEMBERS</span>
            <span class="discourse-stat-value">4,819</span>
            <span class="discourse-stat-sub">+143 THIS WEEK</span>
          </div>
        </div>
        <div class="discourse-stat-item">
          <div class="discourse-stat-icon">
            <i class="bi bi-file-text-fill"></i>
          </div>
          <div class="discourse-stat-body">
            <span class="discourse-stat-label">POSTS TODAY</span>
            <span class="discourse-stat-value">390</span>
            <span class="discourse-stat-sub">ACROSS 9 TOPICS</span>
          </div>
        </div>
        <div class="discourse-stat-item">
          <div class="discourse-stat-icon">
            <i class="bi bi-wifi"></i>
          </div>
          <div class="discourse-stat-body">
            <span class="discourse-stat-label">ONLINE NOW</span>
            <span class="discourse-stat-value">1,042</span>
            <span class="discourse-stat-sub">ACTIVE USERS</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ── Widget 3: Communities List ─────────────────────────── -->
  <div class="card discourse-communities-card mb-4">
    <div class="card-body p-4">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <h6 class="discourse-widget-title mb-0">Communities</h6>
        <a href="#all-communities" class="discourse-see-all-btn">See All</a>
      </div>
      <div class="discourse-community-list">
        <a href="#community-page" class="discourse-community-item">
          <div class="discourse-community-avatar discourse-community-feutech">
            <i class="bi bi-cpu"></i>
          </div>
          <div class="discourse-community-info">
            <span class="discourse-community-name">FEUTech</span>
            <span class="discourse-community-members">2,541 members</span>
          </div>
        </a>
        <a href="#community-page" class="discourse-community-item">
          <div class="discourse-community-avatar discourse-community-feulife">
            <i class="bi bi-heart-fill"></i>
          </div>
          <div class="discourse-community-info">
            <span class="discourse-community-name">FEULife</span>
            <span class="discourse-community-members">1,436 members</span>
          </div>
        </a>
        <a href="#community-page" class="discourse-community-item">
          <div class="discourse-community-avatar discourse-community-culturehub">
            <i class="bi bi-music-note-beamed"></i>
          </div>
          <div class="discourse-community-info">
            <span class="discourse-community-name">CultureHub</span>
            <span class="discourse-community-members">862 members</span>
          </div>
        </a>
      </div>
    </div>
  </div>

  <!-- ── Widget 4: Browse Topics ────────────────────────────── -->
  <div class="card discourse-topics-card mb-4">
    <div class="card-body p-4">
      <h6 class="discourse-widget-title mb-3">Browse Topics</h6>
      <div class="discourse-topic-tags">
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-cpu me-1"></i>TECHNOLOGY</a>
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-palette me-1"></i>CULTURE</a>
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-controller me-1"></i>GAMING</a>
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-building me-1"></i>FEU</a>
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-lightbulb me-1"></i>IDEAS</a>
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-stars me-1"></i>CREATIVE</a>
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-flask me-1"></i>SCIENCE</a>
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-newspaper me-1"></i>NEWS</a>
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-robot me-1"></i>AI</a>
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-book me-1"></i>ACADEMICS</a>
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-emoji-smile me-1"></i>LIFESTYLE</a>
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-film me-1"></i>ENTERTAINMENT</a>
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-music-note me-1"></i>MUSIC</a>
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-megaphone me-1"></i>POLITICS</a>
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-exclamation-circle me-1"></i>ISSUES</a>
        <a href="#community-page" class="discourse-topic-tag"><i class="bi bi-trophy me-1"></i>SPORTS</a>
      </div>
    </div>
  </div>

  <!-- ── Widget 5: Campus Buzz ──────────────────────────────── -->
  <div class="card discourse-buzz-card mb-4">
    <div class="card-body p-4">
      <h6 class="discourse-widget-title mb-3">Campus Buzz</h6>
      <p class="discourse-buzz-section-label">TRENDING TODAY</p>
      <div class="discourse-hashtag-row mb-3">
        <span class="discourse-hashtag">#HASHTAG</span>
        <span class="discourse-hashtag">#WORLDPEACE</span>
        <span class="discourse-hashtag">#VALORANT</span>
        <span class="discourse-hashtag">#PETITION</span>
        <span class="discourse-hashtag">#POSTER</span>
      </div>
      <p class="discourse-buzz-section-label">POSTING TIPS</p>
      <ul class="discourse-tips-list">
        <li><i class="bi bi-arrow-right-circle-fill me-2"></i>Use anonymous mode for sensitive topics — your ID stays hidden.</li>
        <li><i class="bi bi-arrow-right-circle-fill me-2"></i>Post a poll to settle debates fast.</li>
        <li><i class="bi bi-arrow-right-circle-fill me-2"></i>Tag the right community for better reach.</li>
      </ul>
    </div>
  </div>
</div>