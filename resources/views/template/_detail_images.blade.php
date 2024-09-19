<img id="img" src="{{ adminUrl('assets/images/design-online/template/' . $template->template_image) }}" style="max-width:100%;" class="data-tilt" transform-style: preserve-3d>
<div class="modal-img-zoom">
    <span class="close-modal-zoom">&times;</span>
    <img class="content">
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
<script type="text/javascript">
    $('.data-tilt').tilt({
        glare: true,
        maxGlare: .5,
    })
</script>
