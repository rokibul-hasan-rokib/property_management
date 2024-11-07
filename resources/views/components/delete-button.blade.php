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
        const button = event.target.querySelector('.delete_swal');
        const title = button.getAttribute('data-title');
        const text = button.getAttribute('data-text');

        const confirmation = confirm(`${title}\n\n${text}`);

        if (!confirmation) {
            event.preventDefault(); // Stop form submission if not confirmed
            return false;
        }
    }
</script>
