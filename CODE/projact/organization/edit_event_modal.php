<!-- ملف edit_event_modal.php -->
<div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEventModalLabel">تعديل الفعالية</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editEventForm">
                    <!-- Event Name -->
                    <div class="mb-3">
                        <label for="editEventName" class="form-label">اسم الفعالية</label>
                        <input type="text" class="form-control" id="editEventName" name="eventName" required>
                    </div>

                    <!-- Event Start Date -->
                    <div class="mb-3">
                        <label for="editStartDate" class="form-label">تاريخ البداية</label>
                        <input type="date" class="form-control" id="editStartDate" name="startDate" required>
                    </div>

                    <!-- Event End Date -->
                    <div class="mb-3">
                        <label for="editEndDate" class="form-label">تاريخ النهاية</label>
                        <input type="date" class="form-control" id="editEndDate" name="endDate" required>
                    </div>

                    <!-- Event Location -->
                    <div class="mb-3">
                        <label for="editLocation" class="form-label">الموقع</label>
                        <input type="text" class="form-control" id="editLocation" name="location" required>
                    </div>

                    <!-- Required Skills -->
                    <div class="mb-3">
                        <label for="editRequiredSkills" class="form-label">المهارات المطلوبة</label>
                        <input type="text" class="form-control" id="editRequiredSkills" name="requiredSkills" required>
                    </div>

                    <!-- Event Description -->
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">وصف الفعالية</label>
                        <textarea class="form-control" id="editDescription" name="description" rows="3" required></textarea>
                    </div>

                    <!-- Event Image -->
                    <div class="mb-3">
                        <label for="editEventImage" class="form-label">صورة الفعالية</label>
                        <input type="file" class="form-control" id="editEventImage" name="eventImage" accept="image/*">
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>