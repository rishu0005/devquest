<x-app>
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            <p>{{ session('error') }}</p>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-10 p-5">

                <h1> Hello This is Dashboard</h1>
                <div class="d-flex">
                    <x-modal-button target="questModal" >Create Quest</x-modal-button>
                    <a href="{{ route('view_quests' , Auth::id()) }}">View Quests</a>
                </div>

            </div>
        </div>
    </div>




<form action="{{ route('store_quest') }}" method="POST">
@csrf
    <x-modal-dialog modal_id="questModal" title="Create Quest" btn_label="Create Quest" >
        <div class="mb-3">
            <label for="questName" class="form-label fw-bold">Quest Name</label>
            <input type="text" class="form-control" id="questName" placeholder="Create a Weapon" name="quest_name" required>


        </div>
        <div class="mb-3">
            <label for="questDescription" class="form-label fw-bold">Quest Description</label>
            <textarea class="form-control" id="questDescription" placeholder="Collect material for creating a weapon" name="quest_description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="quest_start_date" class="form-label fw-bold">Start Time</label>
                        <input type="date" class="form-control" id="quest_start_date" name="quest_start_date" required>
        </div>
        <div class="mb-3">
            <label for="quest_end_date" class="form-label fw-bold">End Time</label>
                        <input type="date" class="form-control" id="quest_end_date" name="quest_end_date" required>
        </div>
        {{-- <button type="submit" class="btn btn-primary accent">Create Quest</button> --}}
    </x-modal-dialog>
</form> 

</x-app>