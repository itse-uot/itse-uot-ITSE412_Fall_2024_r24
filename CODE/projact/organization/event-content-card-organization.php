<!-- تضمين jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- تضمين ملف JavaScript -->
<script src="../assets/js/loadEventsOrganization.js"></script>

<!-- قسم البطاقات -->
<div class="container">
  <div class="row" id="eventsContainer">
    <!-- سيتم إضافة البطاقات هنا بشكل ديناميكي -->
  </div>
</div>

<!-- Modal لعرض التقييمات فقط -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reviewModalLabel">التقييمات</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- عرض التقييمات السابقة -->
        <div class="mb-4">
          <h6>التقييمات السابقة:</h6>
          <div id="previousReviews">
            <!-- سيتم عرض التقييمات هنا -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>