$(()=>{
    $(".modify-tweet").click(function(e){
        modifyTweetContent(e.currentTarget);
    });
})

/**
 *  Enable modify tweet content
 * @param {<button> element} modifyBtn 
 */
function modifyTweetContent(modifyBtn){
    id = $(modifyBtn).parent().parent().eq(0).find(".tweet-id").html();
    contentElement = $(modifyBtn).parent().parent().eq(0).find(".tweet-content");
    contentElement.replaceWith(`<textarea class='tweet-area'>${contentElement.html()}</textarea>`);

    $(modifyBtn).replaceWith("<button class='save-tweet'> <b>Save</b> </button>");
    
    $(".save-tweet").click(function(e){
        content = $(e.currentTarget).parent().parent().eq(0).find(".tweet-content");
        updateTweet(e.currentTarget);
    });
}

/**
 * Store new tweet content and disable modify tweet
 * @param {<button> element} saveBtn 
 * @param {string} id 
 * @param {string} content 
 * @returns 
 */
async function updateTweet(saveBtn, id, content){
    
    res = await fetch("http://localhost:8080/api/tweet/update",{
        method: "PATCH",
        headers:{
            "Content-Type":"application/json"
        },
        body: JSON.stringify({
            id: id,
            content: content 
        })
    });

    console.log(res, res.json());

    if(res.ok && res.status=="200"){
        console.log("UPDATED with success");

        areaElement = $(saveBtn).parent().parent().eq(0).find(".tweet-area");
        areaElement.replaceWith(`<span class='tweet-content'>${areaElement.html()}</span>`)
        
        $(saveBtn).replaceWith("<button class='modify-tweet'> <b>Modify</b> </button>");
        $(".modify-tweet").click(function(e){
            modifyTweetContent(e.currentTarget);
        });

        return;
    }
    
    console.log("PATCH request error");

}