//set data on edit reported fault modal box
$( document ).on( 'click', '.edit_reported_fault', ( e ) => {
   const dt_set = e.target.dataset;
   
   $( '#refaulted_fault_id' ).val( dt_set.id );
   $( '#edit_status' ).val( dt_set.status );
   $( '#edit_engineer_id' ).val( dt_set.engineer_id );
});