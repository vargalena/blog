document.addEventListener('DOMContentLoaded', function() {
  
    function fetchPosts() {
        fetch('/blog/api.php') 
            .then(response => response.json())
            .then(posts => {
                const postsDiv = document.getElementById('posts');
                postsDiv.innerHTML = '';

                posts.sort((a, b) => new Date(b.created_at) - new Date(a.created_at)); 
                
                posts.forEach(post => {
                    const postElement = document.createElement('div');
                    postElement.classList.add('post'); 

                    postElement.innerHTML = `
                        <h3>${post.title}</h3>
                            <p class="post-content" id="content-${post.id}">${post.content.substring(0, 100)}${
                            post.content.length > 100 ? '... <button id=more_button onclick="showMore(' + post.id + ')">Több mutatása</button>' : ''
                        }</p>
                        <small>Felhasználónév: ${post.username}</small>
                        <p><small>Bejegyzés időpontja: ${post.created_at}</small></p>    
                    `;
                    postsDiv.appendChild(postElement);
                });
            })
            .catch(error => console.error('Hiba történt a bejegyzések betöltésekor:', error));
    }

 
    document.getElementById('postForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        const username = document.getElementById('username').value;
        const title = document.getElementById('title').value;
        const content = document.getElementById('content').value;

        fetch('/blog/api.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ username, title, content })
        })
            .then(() => {
                fetchPosts(); 
                this.reset(); 
            });
    }); 

  
    window.showMore = function(postId) {
    fetch('api.php?id=' + postId)
        .then(response => response.json())
        .then(post => {
            const contentElement = document.getElementById('content-' + postId);
            if (post.content) {
                contentElement.innerHTML = post.content; 
            } else {
                console.error('Hiba: a bejegyzés tartalma üres vagy nem található!');
            }
        })
        .catch(error => console.error('Hiba történt a bejegyzés teljes tartalmának betöltésekor:', error));
    };


    fetchPosts();
});