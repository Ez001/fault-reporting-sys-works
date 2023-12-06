/*
   Date modified: 29/09/2023
*/

const makeAjaxCall = async ( url, method, data, ret = false ) => {
   let res;

   try
   {
      res = await $.ajax({
         url: url, 
         method: method, 
         data: data,
      });

      //alert( res );
      if ( ret )
      {
         return res;
      }
   }
   catch ( err )
   {
      console.error( err );
   }
};

const promptUser = ( dt_name ) => {
   return confirm( 'Do you really want to ' + dt_name );
};

$( document ).on( 'click', '.del_btn', ( e ) => { 
   const dt_url = e.currentTarget.getAttribute( 'data-url' );
   const dt_delete = e.currentTarget.getAttribute( 'data-delete' );
   const dt_name = e.currentTarget.getAttribute( 'data-name' );

   //validating
   if ( dt_delete ) 
   {
      if ( promptUser( dt_name ) )
      {  
         makeAjaxCall( dt_url, 'POST', { dt_delete }, true ).then( ( data ) => 
            //redirect
            window.location.replace( server_name  + '/' + dt_url )
         );
      }
   }
   else
   {
      alert( 'Please select an item' );
   }
});
