<div class="modal fade" id="modalHowToClaim" tabindex="-1" aria-labelledby="modalHowToClaimLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div>
          <span class="badge badge-light-primary mb-2">CLAIMING GUIDE</span>
          <h2 class="modal-title fw-bold" id="modalHowToClaimLabel">How to Claim This Item</h2>
        </div>
        <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
          <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
        </button>
      </div>

      <div class="modal-body">
        <p class="text-gray-600 fs-7 mb-6">Follow these steps to retrieve your item from the Discipline Office.</p>

        <?php
        $claimSteps = [
          ['Go to the Discipline Office', 'Visit Room 1501, 15th Floor, Monday to Friday from 8:00 AM to 5:00 PM.'],
          ['Provide the Details Needed', 'Describe unique details such as scratches, contents, stickers, or initials. Bring your school ID.'],
          ['Claim Your Item', 'Once the information is verified, the staff will release the item to you.'],
        ];
        foreach ($claimSteps as $index => $step):
        ?>
          <div class="d-flex align-items-start mb-5">
            <div class="symbol symbol-40px me-4">
              <span class="symbol-label bg-light-primary text-primary fw-bold"><?= $index + 1 ?></span>
            </div>
            <div>
              <div class="fw-bold text-gray-900 mb-1"><?= htmlspecialchars($step[0]) ?></div>
              <div class="text-gray-600 fs-7"><?= htmlspecialchars($step[1]) ?></div>
            </div>
          </div>
        <?php endforeach; ?>

        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-5">
          <i class="ki-duotone ki-geolocation fs-2x text-primary me-4">
            <span class="path1"></span><span class="path2"></span>
          </i>
          <div class="fw-semibold text-gray-700 fs-7">
            Discipline Office · Room 1501, 15th Floor<br>
            Monday–Friday · 8:00 AM–5:00 PM
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal">Got It</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalHowToSurrender" tabindex="-1" aria-labelledby="modalHowToSurrenderLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div>
          <span class="badge badge-light-success mb-2">SURRENDERING GUIDE</span>
          <h2 class="modal-title fw-bold" id="modalHowToSurrenderLabel">Found Something?</h2>
        </div>
        <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
          <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
        </button>
      </div>

      <div class="modal-body">
        <p class="text-gray-600 fs-7 mb-6">Thank you for helping a fellow Tamaraw. Follow these steps to surrender the item.</p>

        <?php
        $surrenderSteps = [
          ['Keep the Item Safe', 'Do not leave it unattended or post identifying details on social media.'],
          ['Visit the Discipline Office', 'Bring it to Room 1501, 15th Floor during office hours.'],
          ['Let the Staff Record It', 'The staff will add the item to the Lost and Found system.'],
          ['Owner Verification', 'The owner must provide identifying details before the item is released.'],
        ];
        foreach ($surrenderSteps as $index => $step):
        ?>
          <div class="d-flex align-items-start mb-5">
            <div class="symbol symbol-40px me-4">
              <span class="symbol-label bg-light-success text-success fw-bold"><?= $index + 1 ?></span>
            </div>
            <div>
              <div class="fw-bold text-gray-900 mb-1"><?= htmlspecialchars($step[0]) ?></div>
              <div class="text-gray-600 fs-7"><?= htmlspecialchars($step[1]) ?></div>
            </div>
          </div>
        <?php endforeach; ?>

        <div class="notice d-flex bg-light-success rounded border-success border border-dashed p-5">
          <i class="ki-duotone ki-geolocation fs-2x text-success me-4">
            <span class="path1"></span><span class="path2"></span>
          </i>
          <div class="fw-semibold text-gray-700 fs-7">
            Discipline Office · Room 1501, 15th Floor<br>
            Monday–Friday · 8:00 AM–5:00 PM
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success w-100" data-bs-dismiss="modal">Got It</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalConfirmDetails" tabindex="-1" aria-labelledby="modalConfirmDetailsLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fw-bold" id="modalConfirmDetailsLabel">Review Your Report</h2>
        <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
          <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
        </button>
      </div>

      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-row-bordered align-middle mb-0">
            <tbody>
              <tr><th class="text-muted w-150px">Item</th><td class="fw-semibold text-gray-800" id="review-item">—</td></tr>
              <tr><th class="text-muted">Category</th><td class="fw-semibold text-gray-800" id="review-category">—</td></tr>
              <tr><th class="text-muted">Last Seen At</th><td class="fw-semibold text-gray-800" id="review-location">—</td></tr>
              <tr><th class="text-muted">Date / Time</th><td class="fw-semibold text-gray-800" id="review-datetime">—</td></tr>
              <tr><th class="text-muted">Reporter</th><td class="fw-semibold text-gray-800" id="review-reporter">—</td></tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary w-100" id="btn-submit-report">Submit Lost Report</button>
      </div>
    </div>
  </div>
</div>
