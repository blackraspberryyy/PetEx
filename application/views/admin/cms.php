<script>
    $(document).ready(function(){
        $('#quotation').trumbowyg('html', '<?= addslashes($cms->quotation)?>');
        $('#quotationBy').trumbowyg('html', '<?= addslashes($cms->quotationBy)?>');
        $('#aboutus_content').trumbowyg('html', '<?= addslashes($cms->aboutus_content)?>');
        $('#petadoption_content').trumbowyg('html', '<?= addslashes($cms->petadoption_content)?>');
        $('#myprogress_content').trumbowyg('html', '<?= addslashes($cms->myprogress_content)?>');
        $('#mypets_content').trumbowyg('html', '<?= addslashes($cms->mypets_content)?>');
        $('#mobapp_content').trumbowyg('html', '<?= addslashes($cms->mobapp_content)?>');
    });
</script>
<div class ="side-nav-offset">
    <div class ="container">
        <div class = "card row">
            <nav class = "green darken-3">
                <div class="col s12">
                    <a href="<?= $wholeUrl ?>" class="breadcrumb">Content Management System</a>
                </div>
            </nav>
            <div class="card-content ">
                <form action ="<?= base_url()?>admin/cms_exec" method="POST">
                    <blockquote style = " font-size:2em !important;">Quotation</blockquote>
                    <div id ="quotation" name = "quotation"></div><br>
                    <blockquote style = " font-size:2em !important;">Quotation By</blockquote>
                    <div id ="quotationBy" name = "quotationBy"></div><br>
                    <blockquote style = " font-size:2em !important;">About Us Content</blockquote>
                    <div id ="aboutus_content" name = "aboutus_content"></div><br>
                    <blockquote style = " font-size:2em !important;">Pet Adoption Content</blockquote>
                    <div id ="petadoption_content" name = "petadoption_content"></div><br>
                    <blockquote style = " font-size:2em !important;">My Progress Content</blockquote>
                    <div id ="myprogress_content" name = "myprogress_content"></div><br>
                    <blockquote style = " font-size:2em !important;">My Pets Content</blockquote>
                    <div id ="mypets_content" name = "mypets_content"></div><br>
                    <blockquote style = " font-size:2em !important;">Mobile Application Content</blockquote>
                    <div id ="mobapp_content" name = "mobapp_content"></div><br>
                    
                    <button type ="submit" class = "btn btn-block green darken-4 right">Done</button>
                    <a href = "#" onclick = "window.history.back()" class = "btn btn-block right white black-text" style = "margin-right: 20px !important;">Back</a><br>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#title').trumbowyg({
        btns: [
            ['viewHTML'],
            ['undo', 'redo'], // Only supported in Blink browsers
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['orderedList'],
            ['horizontalRule'],
            ['fullscreen']
        ],
        autogrow: true
    });
    $('#quotation').trumbowyg({
        btns: [
            ['viewHTML'],
            ['undo', 'redo'], // Only supported in Blink browsers
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['orderedList'],
            ['horizontalRule'],
            ['fullscreen']
        ],
        autogrow: true
    });
    $('#quotationBy').trumbowyg({
        btns: [
            ['viewHTML'],
            ['undo', 'redo'], // Only supported in Blink browsers
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['orderedList'],
            ['horizontalRule'],
            ['fullscreen']
        ],
        autogrow: true
    });
    $('#aboutus_content').trumbowyg({
        btns: [
            ['viewHTML'],
            ['undo', 'redo'], // Only supported in Blink browsers
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['orderedList'],
            ['horizontalRule'],
            ['fullscreen']
        ],
        autogrow: true
    });
    $('#petadoption_content').trumbowyg({
        btns: [
            ['viewHTML'],
            ['undo', 'redo'], // Only supported in Blink browsers
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['orderedList'],
            ['horizontalRule'],
            ['fullscreen']
        ],
        autogrow: true
    });
    $('#myprogress_content').trumbowyg({
        btns: [
            ['viewHTML'],
            ['undo', 'redo'], // Only supported in Blink browsers
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['orderedList'],
            ['horizontalRule'],
            ['fullscreen']
        ],
        autogrow: true
    });
    $('#mypets_content').trumbowyg({
        btns: [
            ['viewHTML'],
            ['undo', 'redo'], // Only supported in Blink browsers
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['orderedList'],
            ['horizontalRule'],
            ['fullscreen']
        ],
        autogrow: true
    });
    $('#mobapp_content').trumbowyg({
        btns: [
            ['viewHTML'],
            ['undo', 'redo'], // Only supported in Blink browsers
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['orderedList'],
            ['horizontalRule'],
            ['fullscreen']
        ],
        autogrow: true
    });
</script>