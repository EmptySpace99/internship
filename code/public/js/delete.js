$(()=>{
    $(".delete-tweet").click(function(e){
        deleteTweet(e.currentTarget);
    });
})

/**
 * 
 * @param {<button> element} deleteBtn 
 * @returns 
 */
async function deleteTweet(deleteBtn){
    tweet = $(deleteBtn).parent().parent().eq(0);
    id = tweet.attr("data-id");

    res = await fetch(`http://localhost:8080/api/tweet/${id}`,{
        method: "DELETE",
    });

    if(res.ok && res.status=="204"){
        console.log("DELETED with success");
        tweet.remove();
        return;
    }
    
    console.log("DELETE request error");
}