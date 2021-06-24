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
    id = $(deleteBtn).parent().parent().eq(0).find(".tweet-id").html();
    
    res = await fetch(`http://localhost:8080/api/tweet/delete/${id}`,{
        method: "DELETE",
    });

    if(res.ok && res.status=="204"){
        console.log("DELETED with success");
        $(deleteBtn).parent().parent().eq(0).remove();
        return;
    }
    
    console.log("DELETE request error");
}