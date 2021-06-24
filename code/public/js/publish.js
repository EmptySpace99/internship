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
        if(response==undefined) return;
        console.log(response); //debug
    })
    .fail(function(){
        console.log('request failed');
    });
}
