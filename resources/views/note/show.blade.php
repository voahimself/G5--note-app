<x-layout>
    <div>
        <div class="note-container single-note">
            <div class="note-header">
                <h1 class="py-4 text-3xl">{{ $note->created_at }}</h1>
                <div class="note-buttons">
                    <a href="#" class="note-edit-button">Edit</a>
                    <button class="note-delete-button">Delete</button>
                </div>
            </div>
            <div class="note">
                <div class="note-body">
                    {{ $note->note }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
