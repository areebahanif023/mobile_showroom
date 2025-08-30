    <!-- Footer Section -->
    <footer class="admin-footer text-center pt-3 pb-1">
        <p>&copy; 2025 Online Mobile Showroom. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create( document.querySelector( '#content' ),{
          ckfinder:
          {
            uploadUrl: 'fileupload.php'
          }
        })
        .then(editor => {
          console.log(editor);
        })
        .catch( error => {
            console.error( error );
        });
</script>
</body>
</html>