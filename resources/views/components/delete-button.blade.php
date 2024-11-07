<form method="POST" action="{{ $route }}" onsubmit="return confirmDelete(event);">
    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="delete_swal btn btn-sm btn-danger ms-1"
        data-title="Are you sure to delete?"
        data-text="This action cannot be undone!"
        data-button_text="Yes, Delete!"
    >
        <i class="fa-solid fa-trash-can"></i>
    </button>
</form>

<script>
    function confirmDelete(event) {
        event.preventDefault(); // Prevent form submission until user confirms

        const button = event.target.querySelector('.delete_swal');
        const title = button.getAttribute('data-title');
        const text = button.getAttribute('data-text');
        const confirmButtonText = button.getAttribute('data-button_text');

        Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: confirmButtonText,
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the form
                event.target.submit();
            }
        });
    }
</script>
