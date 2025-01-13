// Toggle mobile menu
function toggleMenu() {
    const mobileMenu = document.getElementById("mobileMenu");
    if (mobileMenu.style.display === "block") {
      mobileMenu.style.display = "none";
    } else {
      mobileMenu.style.display = "block";
    }
  }
  
  // Handle sub-navigation button clicks
  document.addEventListener('DOMContentLoaded', function() {
    const subNavButtons = document.querySelectorAll('.sub-nav button');
    
    subNavButtons.forEach(button => {
      button.addEventListener('click', function() {
        // Remove active class from all buttons
        subNavButtons.forEach(btn => btn.classList.remove('active'));
        // Add active class to clicked button
        this.classList.add('active');
      });
    });
  });
  
  // Add smooth scroll animation for article cards
  document.querySelectorAll('.article-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-4px)';
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0)';
    });
  });

// Previous toggle menu function remains the same
function toggleMenu() {
    const mobileMenu = document.getElementById("mobileMenu");
    if (mobileMenu.style.display === "block") {
      mobileMenu.style.display = "none";
    } else {
      mobileMenu.style.display = "block";
    }
  }
  
  // Add smooth scroll to footer links
  document.addEventListener('DOMContentLoaded', function() {
    // Previous event listeners remain...
  
    // Smooth scroll for footer links
    document.querySelectorAll('.footer-nav a').forEach(link => {
      link.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href.startsWith('#')) {
          e.preventDefault();
          document.querySelector(href).scrollIntoView({
            behavior: 'smooth'
          });
        }
      });
    });
  
    // Add hover effect for footer links
    document.querySelectorAll('.footer-nav a').forEach(link => {
      link.addEventListener('mouseenter', function() {
        this.style.transition = 'color 0.2s ease';
      });
    });
  });


// Initialize TinyMCE
tinymce.init({
  selector: '#article-content',
  height: 500,
  plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent | removeformat | help'
});

// Delete Article Function
function deleteArticle(articleId) {
  if (confirm('Are you sure you want to delete this article?')) {
      fetch(`delete-article.php?id=${articleId}`, {
          method: 'DELETE'
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              location.reload();
          } else {
              alert('Error deleting article');
          }
      });
  }
}

// Toggle Mobile Sidebar
document.querySelector('.menu-toggle')?.addEventListener('click', () => {
  document.querySelector('.admin-sidebar').classList.toggle('active');
});

// Handle Image Upload Preview
function previewImage(input) {
  if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
          document.querySelector('#image-preview').src = e.target.result;
      }
      reader.readAsDataURL(input.files[0]);
  }
}

// Form Validation
function validateForm() {
  const title = document.querySelector('#article-title').value;
  const content = tinymce.get('article-content').getContent();
  
  if (!title || !content) {
      alert('Please fill in all required fields');
      return false;
  }
  return true;
}