$(document).ready(function () {
    $('[data-bs-toggle="tooltip"]').each(function () {
        new bootstrap.Tooltip(this);
    });

    $('[data-action="copy-exam-id"]').on('click', function () {
        const examId = $(this).data('exam-id');

        if (!navigator.clipboard) {
            toastr.error('Copying is not supported by this browser.');
            return;
        }

        navigator.clipboard.writeText(examId)
            .then(function () {
                toastr.success('Exam ID copied.');
            })
            .catch(function () {
                toastr.error('Unable to copy the exam ID.');
            });
    });
});