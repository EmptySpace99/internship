$(()=>{
    $("#delete-tweet").click(()=>deleteTweet());
})

function deleteTweet(){

    $.ajax({
        url: '/tweet/delete',
        type: 'DELETE',
        data:{
            id:$("#delete-tweet").parent().find(".tweet-id").val()
        }

    })
    .done(function(response){
        console.log(response); //debug

        try {
            response = JSON.parse(response);
            console.log(response);
        } 
        catch (error) {
            console.log(error);
        }
        
    })
    .fail(function(){
        console.log('request failed');
    });
}