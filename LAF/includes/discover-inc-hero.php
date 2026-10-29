<div class="row g-5 mb-8">
  <div class="col-lg-9">
    <div class="card card-bordered h-100">
      <div class="card-body d-flex flex-column justify-content-center py-10 px-7 px-lg-10">
        <span class="badge badge-light-primary align-self-start mb-4">FEU TECH · LOST AND FOUND SYSTEM</span>
        <h1 class="text-primary fw-bold fs-2x mb-3">Welcome back, Catalina!</h1>
        <p class="text-gray-600 fs-6 mb-6">Recover your belongings, help a fellow Tamaraw, and keep the campus organized.</p>
        <div class="d-flex flex-wrap gap-3">
          <a href="<?= $LAF_BASE_URL ?>/manage/" class="btn btn-light-danger"><i class="bi bi-search me-2"></i>I Lost Something</a>
          <button type="button" class="btn btn-light-success" data-bs-toggle="modal" data-bs-target="#modalHowToSurrender"><i class="bi bi-check-circle me-2"></i>I Found Something</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="card card-bordered h-100">
      <div class="card-body text-center d-flex flex-column align-items-center">
        <div class="symbol symbol-75px symbol-circle mb-4"><img src="<?= $LAF_BASE_URL ?>/assets/images/catalina.webp" alt="Catalina Smith"></div>
        <div class="fw-bold text-gray-900">Catalina Smith</div>
        <div class="text-muted fs-8 mb-5">Student · BSITBA</div>
        <div class="row g-3 w-100 mb-5">
          <div class="col-6"><div class="bg-light rounded p-3"><div class="fs-3 fw-bold text-primary">8</div><div class="text-muted fs-9">Items Reported</div></div></div>
          <div class="col-6"><div class="bg-light rounded p-3"><div class="fs-3 fw-bold text-success">8</div><div class="text-muted fs-9">Successful Returns</div></div></div>
        </div>
        <button type="button" class="btn btn-sm btn-primary w-100 mt-auto">View Full Profile</button>
      </div>
    </div>
  </div>
</div>
