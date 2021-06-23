class Tweet{
    constructor(id, content, created_at, updated_at){
        this.id = id;
        this.content = content;
        this.created_at = created_at;
        this.updated_at = updated_at;
    }
    

    delete(){
        $.ajax({
            url: '/tweet/delete',
            type: 'DELETE',
        })
        .done(function(response){
            //console.log(response); //debug
    
            try {
                response = JSON.parse(response);
                console.log(responde);
            } 
            catch (error) {
                console.log(error);
            }
            
        })
        .fail(function(){
            console.log('request failed');
        });
    }


    update(){
        $.ajax({
            url: '/tweet/update',
            type: 'PATCH',
            data:{
                content: this.content
            }
        })
        .done(function(response){
            //console.log(response); //debug
    
            try {
                response = JSON.parse(response);
                console.log(responde);
            } 
            catch (error) {
                console.log(error);
            }
            
        })
        .fail(function(){
            console.log('request failed');
        });
    }
}