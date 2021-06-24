$(()=>{
    $(".edit-tweet").click(function(e){
        enableEdit(e.currentTarget);
    });
})


/**
 *  Enable edit tweet content
 * @param {<button> element} editBtn 
 */
function enableEdit(editBtn){
    tweet = $(editBtn).parent().parent().eq(0);
    id = tweet.attr("data-id");
    contentElement = $(editBtn).parent().eq(0).find(".tweet-content");
    contentElement.replaceWith(`<textarea class='form-control tweet-area'>${contentElement.html()}</textarea>`);

    $(editBtn).replaceWith("<button class='btn btn-primary save-tweet'> Save </button>");
    
    $(".save-tweet").click(function(e){
        tweet = $(e.currentTarget).parent().parent().eq(0);
        updateTweet(tweet);
    });
}


/**
 *  Disable edit tweet content
 * @param {tweet object} tweet 
 */
function disableEdit(tweet){
    tweetArea = tweet.find(".tweet-area");
    tweetArea.replaceWith(`<p class='card-text tweet-content'>${tweetArea.html()}</p>`)
    
    tweet.find(".save-tweet").replaceWith("<button class='btn btn-primary edit-tweet'> Edit </button>");
    $(".edit-tweet").click(function(e){
        enableEdit(e.currentTarget);
    });
}


/**
 * Store new tweet content and disable edit tweet
 * @param {tweet object} tweet
 * @returns 
 */
async function updateTweet(tweet){

    id = tweet.attr("data-id");
    content = tweet.find(".tweet-area").html();
    
    res = await fetch(`http://localhost:8080/api/tweet/${id}`,{
        method: "PATCH",
        headers:{
            "Content-Type":"application/json"
        },
        body: JSON.stringify({
            content: content,
        })
    });

    if(res.ok && res.status=="200"){
        res.json().then(data => {
            console.log(data);
        });
        console.log("UPDATED with success");
        disableEdit(tweet);
        return;
    }
    
    console.log("PATCH request error");

}