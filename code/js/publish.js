$(()=>{
    $("#publish-tweet").click(()=>publishTweet());
})

function publishTweet(){

    $.ajax({
        url: '/tweet/create',
        type: 'POST',
        data:{
            content:$("#tweet-area").val()
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
