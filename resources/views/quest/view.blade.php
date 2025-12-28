<x-app>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>  
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header accent">

                        <h3 class="card-title text-white">Quests</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <th>Sr No.</th>
                                <th>title</th>
                                <th>description</th>
                                <th>Action</th>
                            </tr>
                            @forelse ($quests as $index =>$quest)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $quest->title }}</td>
                                    <td>{{ $quest->description }}</td>
                                    <td>
                                        
                                        <div class="btn-group">
                                            <x-modal-button class="btn btn-primary accent edit-quest-btn" 
                                            target="EditQuestModal" 
                                            data-quest-id="{{ $quest->id }}"
                                            data-user-id="{{ $quest->user_id }}"
                                            data-quest-title="{{ $quest->title }}"
                                            data-quest-description="{{ $quest->description }}"
                                            data-quest-start-date="{{ $quest->start_date_time }}"
                                            data-quest-end-date="{{ $quest->end_date_time }}"
                                            >
                                            Edit
                                        </x-modal-button>
                                        <div class="">
                                            @if($quest->status === 'completed')
                                                <button class="btn btn-success " disabled>Completed</button>
                                            @else
                                            <form action="{{ route('mark_quest_complete',  $quest->id  ) }}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                <button class="btn btn-success ">Completed</button>
                                            </form>
                                            @endif
                                            </div>
                                                <x-modal-button class="btn btn-danger quest-delete"
                                                                target="DeleteQuestModal"
                                                                data-quest-id="{{ $quest->id }}"
                                                                >Delete
                                                </x-modal-button>
                                                
                                            </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No Quests Found</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<form action="{{ route('update_quest') }}" method="post">
    @csrf
    @method('put')
    <x-modal-dialog modal_id="EditQuestModal" title="Edit Quest" btn_label="Edit Quest">
        <div class="mb-3">
            <input type="hidden" name="user_id" id="user_id">
            <input type="hidden" name="quest_id" id="quest_id">
            <label for="quest_title" class="form-label">Quest Title</label>
            <input type="text" class="form-control" id="quest_title" name="quest_title" required>
        </div>
        <div class="mb-3">
            <label for="quest_description" class="form-label">Quest Description</label>
            <textarea class="form-control" id="quest_description" name="quest_description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="quest_start_date" class="form-label">Start Date & Time</label>
            <input type="datetime-local" class="form-control" id="quest_start_date" name="quest_start_date" required>
        </div>
        <div class="mb-3">
            <label for="quest_end_date" class="form-label">End Date & Time</label>
            <input type="datetime-local" class="form-control" id="quest_end_date" name="quest_end_date" required>
        </div>
    </x-modal-dialog>
</form>
<form action="{{ route('delete_quest') }}" method="post">
    @csrf
    @method('delete')
    <x-modal-dialog modal_id="DeleteQuestModal" title="Delete Quest" btn_label="Delete Quest">
        <div class="mb-3">
            <input type="hidden" name="quest_id" id="delete_quest_id">
          
            <p>Are you sure you want to delete this quest?</p>
        </div>
    </x-modal-dialog>
</form>
</x-app>