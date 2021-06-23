$(()=>{
    $("#modify-tweet").click(()=>updateTweet());
})

function updateTweet(){

    $.ajax({
        url: '/tweet/update',
        type: 'PATCH',
        data:{
            id:$("#modify-tweet").parent().find(".tweet-id").val()
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