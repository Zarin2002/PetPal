{{-- resources/views/pet-social-wall.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Pet Social Wall - PetConnect</title>
<style>
/* Make everything cursive and 10% larger except topbar and upload button */
body *:not(.topbar):not(.topbar *):not(.upload-form button) {
    font-family: 'Brush Script MT', cursive;
    font-size: 110%; /* 10% larger */
}

/* Page styles */
body {
    margin: 0;
    background-color: #f0f2f5;
    color: #333;
    position: relative;
}

/* Split background effect */
body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 50%;
    height: 100%;
    background: url('https://st2.depositphotos.com/5934840/49502/v/600/depositphotos_495029366-stock-video-little-kids-couple-with-mascots.jpg') center/contain no-repeat;
    opacity: 0.3;
    z-index: -1;
}
body::after {
    content: '';
    position: fixed;
    top: 0;
    right: 0;
    width: 50%;
    height: 100%;
    background: url('https://st2.depositphotos.com/5934840/49502/v/600/depositphotos_495029366-stock-video-little-kids-couple-with-mascots.jpg') center/contain no-repeat;
    opacity: 0.3;
    z-index: -1;
}

/* Falling flowers animation */
.falling-flowers { position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: -1; }
.flower { position: absolute; font-size: 30px; animation-name: fall; animation-duration: 8s; animation-timing-function: linear; animation-iteration-count: infinite; opacity: 0.7; }
.flower:nth-child(1) { animation-duration: 7s; animation-delay: 0s; left: 2%; }
.flower:nth-child(2) { animation-duration: 8s; animation-delay: 1s; left: 7%; }
.flower:nth-child(3) { animation-duration: 9s; animation-delay: 0.5s; left: 12%; }
.flower:nth-child(4) { animation-duration: 7.5s; animation-delay: 1.2s; left: 17%; }
.flower:nth-child(5) { animation-duration: 8.5s; animation-delay: 0.7s; left: 22%; }
.flower:nth-child(6) { animation-duration: 9.2s; animation-delay: 1.5s; left: 27%; }
.flower:nth-child(7) { animation-duration: 7.8s; animation-delay: 2s; left: 32%; }
.flower:nth-child(8) { animation-duration: 8.7s; animation-delay: 1.8s; left: 37%; }
.flower:nth-child(9) { animation-duration: 9.5s; animation-delay: 0.3s; left: 42%; }
.flower:nth-child(10) { animation-duration: 7.9s; animation-delay: 2.3s; left: 47%; }
.flower:nth-child(11) { animation-duration: 8.3s; animation-delay: 1.1s; left: 52%; }
.flower:nth-child(12) { animation-duration: 9.1s; animation-delay: 0.8s; left: 57%; }
.flower:nth-child(13) { animation-duration: 7.6s; animation-delay: 1.4s; left: 62%; }
.flower:nth-child(14) { animation-duration: 8.9s; animation-delay: 0.2s; left: 67%; }
.flower:nth-child(15) { animation-duration: 9.3s; animation-delay: 2s; left: 72%; }
.flower:nth-child(16) { animation-duration: 8.1s; animation-delay: 1.7s; left: 77%; }
.flower:nth-child(17) { animation-duration: 7.7s; animation-delay: 0.5s; left: 82%; }
.flower:nth-child(18) { animation-duration: 8.8s; animation-delay: 1.3s; left: 87%; }
.flower:nth-child(19) { animation-duration: 9.4s; animation-delay: 2.5s; left: 92%; }
.flower:nth-child(20) { animation-duration: 7.5s; animation-delay: 0.9s; left: 97%; }

@keyframes fall { 0% { transform: translateY(-10%) rotate(0deg); } 100% { transform: translateY(110vh) rotate(360deg); } }

/* Topbar */
.topbar { background-color: #f57bcaff; color: white; display: flex; justify-content: space-between; align-items: center; padding: 15px 40px; box-shadow: 0 2px 8px rgba(228, 15, 160, 0.1); }
.topbar a { color: white; text-decoration: none; margin-left: 20px; font-weight: 500; }
.topbar a:hover { text-decoration: underline; }

/* Section title */
.section-title { padding: 20px 40px; font-size: 33px; font-weight: bold; color: #7a0f68ff; text-align: center; }

/* Feed container */
.feed-container { display: flex; flex-direction: column; max-width: 800px; margin: 0 auto 40px; padding: 0 20px; gap: 20px; }

/* Post cards */
.post-card { background: white; border-radius: 15px; box-shadow: 0 4px 12px rgba(234, 95, 171, 0.6); overflow: hidden; transition: transform 0.3s, box-shadow 0.3s; }
.post-card:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(218, 72, 167, 0.54); }
.post-header { display: flex; align-items: center; padding: 10px 15px; gap: 10px; }
.post-header img { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; }
.post-header .user-name { font-weight: bold; font-size: 17.6px; color: #a131b0ff; }
.post-image img { width: 100%; max-height: 500px; object-fit: cover; }
.post-content { padding: 10px 15px; font-size: 15.4px; }

/* Upload form */
.upload-form { margin-bottom: 30px; display: flex; flex-direction: column; gap: 10px; background: white; padding: 15px; border-radius: 15px; box-shadow: 0 4px 12px rgba(241, 106, 189, 0.69); }
.upload-form input[type="file"], .upload-form textarea { font-family: 'Brush Script MT', cursive; font-size: 110%; }
.upload-form textarea { resize: none; padding: 8px; font-size: 15.4px; }
.upload-form button { background-color: #f773cbff; color: white; border: none; padding: 10px; font-weight: bold; cursor: pointer; border-radius: 5px; } /* normal font */
.upload-form button:hover { background-color: #f99cfbff; }

/* Footer */
.footer { text-align: center; padding: 20px; background: #f068dcff; color: white; margin-top: 40px; font-size: 110%; }
</style>
</head>
<body>

<!-- Falling flower emojis -->
<div class="falling-flowers">
    <div class="flower">🌷</div>
    <div class="flower">🌺</div>
    <div class="flower">🌼</div>
    <div class="flower">💐</div>
    <div class="flower">🌹</div>
    <div class="flower">🥀</div>
    <div class="flower">🌸</div>
    <div class="flower">🌸</div>
    <div class="flower">🌺</div>
    <div class="flower">🌼</div>
    <div class="flower">🌹</div>
    <div class="flower">💐</div>
    <div class="flower">🌷</div>
    <div class="flower">🌸</div>
    <div class="flower">🌼</div>
    <div class="flower">🥀</div>
    <div class="flower">🌹</div>
    <div class="flower">💐</div>
    <div class="flower">🌺</div>
    <div class="flower">🌷</div>
</div>

<div class="topbar">
    <div><strong>PetConnect</strong></div>
    <div>
        <a href="/">Home</a>
        <a href="{{ route('my-account') }}">My Account</a>
        <a href="#">Cart</a>
        <a href="#">Logout</a>
    </div>
</div>

<div class="section-title">Pet Social Wall</div>

<div class="feed-container">

    <!-- Upload your post -->
    <form class="upload-form" onsubmit="addPost(event)">
        <input type="file" id="postImage" accept="image/*" required>
        <textarea id="postCaption" rows="2" placeholder="Write a caption..." required></textarea>
        <button type="submit">Upload Post</button>
    </form>

    <!-- Example Posts -->
    <div class="post-card">

<!-- Alice Johnson's Post with Working GIF -->

    <!-- New Post for another user -->
    <div class="post-card">
       <div class="post-header">
        <img src="https://images.unsplash.com/photo-1592194996308-7b43878e84a6?auto=format&fit=crop&w=50&q=80" alt="User">
        <div class="user-name">Jessica Lee</div>
       </div>
       <div class="post-image">
        <img src="https://images.unsplash.com/photo-1587559070757-f72a388edbba?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8ZG9nJTIwcGxheWluZ3xlbnwwfHwwfHx8MA%3D%3D" alt="Dog Playing">
       </div>
       <div class="post-content">
        Look at Max enjoying his playtime! 🐕🎾
       </div>
    </div>
    <!-- New Post for Sophie Park -->

<!-- New Post for Emily Chen -->
    <div class="post-card">
     <div class="post-header">
        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=50&q=80" alt="User">
        <div class="user-name">Emily Chen</div>
     </div>
     <div class="post-image">
        <img src="https://i.pinimg.com/originals/4e/91/b4/4e91b4c5071c9f5033a77f6ddd56ebd5.gif" alt="Kitten Playing">
     </div>
     <div class="post-content">
        Emily's playful moment with her kitten! 🐾
     </div>
    </div>

       <div class="post-card">
     <div class="post-header">
        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=50&q=80" alt="User">
        <div class="user-name">Sophie Park</div>
     </div>
     <div class="post-image">
        <img src="https://i.pinimg.com/736x/53/03/3a/53033a38a972e8f771116031886abd0e.jpg" alt="Dog">
     </div>
     <div class="post-content">
        Check out this playful pup! 🐕❤️
     </div>
    </div>


    <div class="post-card">
     <div class="post-header">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6oPBH52Vhp6KQpxkY8frlMBLJcriJwTgG_w&s" alt="Alice Johnson">
        <div class="user-name">Alice Johnson</div>
     </div>
     <div class="post-image">
        <img src=https://media.tenor.com/j5H7B5tvTtEAAAAM/cat-kiss-kitten-kiss.gif alt="Kitten Playing with Brush">
     </div>
     <div class="post-content">
        Alice's kitten is brushing up on its skills! 🐾🧹
     </div>
    </div>

    </div>

</div>

<div class="footer">
    &copy; 2025 PetConnect. All Rights Reserved.
</div>

<script>
// JavaScript to add a new post from the upload form
function addPost(event) {
    event.preventDefault();
    const imageInput = document.getElementById('postImage');
    const captionInput = document.getElementById('postCaption');

    const reader = new FileReader();
    reader.onload = function() {
        const feed = document.querySelector('.feed-container');

        const postCard = document.createElement('div');
        postCard.classList.add('post-card');
        postCard.innerHTML = `
            <div class="post-header">
                <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=50&q=80" alt="You">
                <div class="user-name">You</div>
            </div>
            <div class="post-image">
                <img src="${reader.result}" alt="Pet">
            </div>
            <div class="post-content">${captionInput.value}</div>
        `;
        feed.insertBefore(postCard, feed.children[1]);

        // Reset form
        imageInput.value = '';
        captionInput.value = '';
    };
    reader.readAsDataURL(imageInput.files[0]);
}
</script>

</body>
</html>









