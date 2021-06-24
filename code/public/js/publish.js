$(()=>{
    $("#publish-tweet").click(()=>publishTweet());
})

function publishTweet(){

    $.ajax({
        url: '/api/tweet/create',
        type: 'POST',
        data:{
            content:$("#tweetArea").val()
        }

    })
    .done(function(response){
        //console.log(response); //debug
        if(response==undefined) return;

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
