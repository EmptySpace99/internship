$(()=>{
    $("#publish-tweet").click(()=>publishTweet());
})

function publishTweet(){

    $.ajax({
        url: '/tweet/store',
        type: 'POST',
        data:{
            content:$("#tweetArea").val()
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
