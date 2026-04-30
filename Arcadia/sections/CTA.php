<?php /* includes/cta-banner.php */ ?>
<style>
  /* ── CTA BANNER ── */
.cta-section {
  background: linear-gradient(135deg, #f59e0b 0%, #FB923C 50%, #E05A00 100%);
  padding: 80px 0;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.cta-section::before {
  content: '';
  position: absolute; inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='20'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  pointer-events: none;
}
.cta-section .section-label { color: rgba(255,255,255,0.75); }
.cta-section h2 {
  color: #fff;
  font-size: clamp(2rem, 4vw, 3.2rem);
  font-weight: 900;
  line-height: 1.15;
  margin-bottom: 1rem;
}
.cta-section p { color: rgba(255,255,255,0.85); font-size: 0.95rem; max-width: 460px; margin: 0 auto 2rem; }
.btn-cta-white {
  background: #fff;
  color: #f59e0b;
  border: none;
  border-radius: 10px;
  font-weight: 800;
  font-size: 0.95rem;
  padding: 0.75rem 2rem;
  box-shadow: 0 4px 14px rgba(0,0,0,0.15);
  transition: all 0.2s;
  cursor: pointer;
}
.btn-cta-white:hover { background: #FFF8F1; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,0.18); color: #f59e0b; }

/* ── FOOTER ── */
.arcadia-footer {
  background: #FFF8F1;
  border-top: 1px solid #E7E5E4;
  padding: 2.5rem 0;
}
.arcadia-footer .footer-logo { height: 34px; }
.arcadia-footer .footer-desc { font-size: 0.82rem; color: #78716C; line-height: 1.7; max-width: 280px; }
.arcadia-footer .footer-links a {
  display: block;
  font-size: 0.82rem;
  color: #78716C;
  text-decoration: none;
  font-weight: 600;
  margin-bottom: 6px;
  transition: color 0.18s;
}
.arcadia-footer .footer-links a:hover { color: #f59e0b; }
.arcadia-footer .footer-links h6 {
  font-size: 0.78rem;
  font-weight: 900;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: #1C1917;
  margin-bottom: 0.75rem;
}
.arcadia-footer .social-btn {
  width: 36px; height: 36px;
  border-radius: 8px;
  display: inline-flex; align-items: center; justify-content: center;
  background: #FDE8D0;
  color: #f59e0b;
  font-size: 1rem;
  text-decoration: none;
  transition: background 0.18s;
  margin-right: 6px;
}
.arcadia-footer .social-btn:hover { background: var(--arcadia-orange); color: #fff; }
.arcadia-footer .footer-bottom {
  border-top: 1px solid #E7E5E4;
  margin-top: 2rem;
  padding-top: 1.25rem;
  font-size: 0.78rem;
  color: #78716C;
}
</style>
<section class="cta-section">
  <div class="container position-relative" style="z-index:1;">
    <span class="section-label">JOIN ARCADIA</span>
    <h2>
      Claim. Level Up.<br>
      Redeem. Dominate.
    </h2>
    <p>
      Join over 12,000 students transforming how they learn.
      Start earning badges, collecting XP, and claiming real rewards today.
    </p>
    <div class="d-flex flex-wrap gap-3 justify-content-center">
      <a href="#" class="btn btn-cta-white">Join Arcadia Now →</a>
      <a href="#" class="btn btn-hero-secondary" style="color:#fff;border-color:rgba(255,255,255,0.5);">Explore Badges</a>
    </div>
  </div>
</section>
