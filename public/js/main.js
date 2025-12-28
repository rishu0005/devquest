$(document).ready(function(){

    // Handle Edit Quest button click
   $('.edit-quest-btn').on('click', function(){
      
        let questId = $(this).data('quest-id');
        let userId  = $(this).data('user-id');
        let title   = $(this).data('quest-title');
        let description = $(this).data('quest-description');
        let startDate   = $(this).data('quest-start-date');
        let endDate     = $(this).data('quest-end-date');
        console.log("Editing quest ID: " + questId , userId, title, description, startDate, endDate);
        $('#quest_id').val(questId);                       
        $('#user_id').val(userId);
        $('#quest_title').val(title);
        $('#EditQuestModal textarea[name="quest_description"]').val(description);
        $('#EditQuestModal input[name="quest_start_date"]').val(startDate);
        $('#EditQuestModal input[name="quest_end_date"]').val(endDate);       
   });

//    Handle Delete Quest button click
$('.quest-delete').on('click', function(){
    let questId = $(this).data('quest-id');
    $('#delete_quest_id').val(questId);
});
});