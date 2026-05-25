<!-- ============================================================
     DISCOURSE — Search Bar + Tab Filters Section
     File: Main/sec-search-filter.php
     CSS:  assets/css/sec-search-filter.css
     JS:   assets/js/sec-search-filter.js
============================================================ -->
<div class="discourse-search-filter-bar mb-3" id="discourse-search-filter">

  <!-- Search + New Post Row -->
  <div class="discourse-search-row mb-3">
    <div class="discourse-search-input-wrap">
      <i class="bi bi-search discourse-search-icon"></i>
      <input
        type="text"
        class="discourse-search-input"
        placeholder="Search discussions, topics, people, communities..."
        id="discourse-search-input"
      />
    </div>
    <a href="#create-post" class="discourse-new-post-btn">
      <i class="bi bi-plus-lg me-1"></i> New Post
    </a>
  </div>

  <!-- Tab Filters + Topics Dropdown Row -->
  <div class="discourse-tabs-row">
    <ul class="nav discourse-tab-nav" id="discoursePostTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="discourse-tab-btn active" id="tab-hot" data-bs-toggle="tab" data-bs-target="#posts-hot" type="button" role="tab" aria-controls="posts-hot" aria-selected="true">
          <i class="bi bi-fire me-1"></i> HOT
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="discourse-tab-btn" id="tab-new" data-bs-toggle="tab" data-bs-target="#posts-new" type="button" role="tab" aria-controls="posts-new" aria-selected="false">
          <i class="bi bi-lightning-charge me-1"></i> NEW
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="discourse-tab-btn" id="tab-top" data-bs-toggle="tab" data-bs-target="#posts-top" type="button" role="tab" aria-controls="posts-top" aria-selected="false">
          <i class="bi bi-trophy me-1"></i> TOP
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="discourse-tab-btn" id="tab-rising" data-bs-toggle="tab" data-bs-target="#posts-rising" type="button" role="tab" aria-controls="posts-rising" aria-selected="false">
          <i class="bi bi-graph-up-arrow me-1"></i> RISING
        </button>
      </li>
    </ul>

    <!-- All Topics Dropdown -->
    <div class="dropdown discourse-topics-dropdown">
      <button class="discourse-topics-dropdown-btn dropdown-toggle" type="button" id="topicsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        All Topics
      </button>
      <ul class="dropdown-menu dropdown-menu-end discourse-topics-dropdown-menu" aria-labelledby="topicsDropdown">
        <li><a class="dropdown-item" href="#community-page">Technology</a></li>
        <li><a class="dropdown-item" href="#community-page">Culture</a></li>
        <li><a class="dropdown-item" href="#community-page">Gaming</a></li>
        <li><a class="dropdown-item" href="#community-page">FEU</a></li>
        <li><a class="dropdown-item" href="#community-page">Ideas</a></li>
        <li><a class="dropdown-item" href="#community-page">Creative</a></li>
        <li><a class="dropdown-item" href="#community-page">Science</a></li>
        <li><a class="dropdown-item" href="#community-page">News</a></li>
        <li><a class="dropdown-item" href="#community-page">AI</a></li>
        <li><a class="dropdown-item" href="#community-page">Academics</a></li>
        <li><a class="dropdown-item" href="#community-page">Lifestyle</a></li>
        <li><a class="dropdown-item" href="#community-page">Sports</a></li>
      </ul>
    </div>
  </div>

</div>
