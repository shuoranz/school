var blogConfig = {
    toolbar: {
        items: ["heading","fontfamily","fontsize","fontcolor","fontbackgroundcolor","|",
                "bold","italic", "underline", "strikethrough","subscript", "superscript", "removeformat","|", 
                "bulletedlist","numberedlist", "indent", "outdent","horizontalline","pagebreak",
                "undo", "redo","|","alignment","link","blockquote","highlight",
                 "ckfinder", "specialcharacters","mediaembed","|",
                 "imageupload","imagetextalternative", "imagestyle:full", "imagestyle:side","|",   
                 "inserttable", "tablecolumn", "tablerow", "mergetablecells", "tablecellproperties", "tableproperties"],
        viewportTopOffset: 45,
        shouldNotGroupWhenFull: true,
        
    },
    ckfinder: {
        uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json',
        openerMethod: 'modal',
        // options: {
        //     resourceType: 'Images',
        // },
    },
    plugins: ["Alignment", "Autoformat", "Autosave", "BlockQuote", "Bold", "CKFinder", "CKFinderUploadAdapter", 
              "Essentials", "FontBackgroundColor", "FontColor", "FontFamily", "FontSize", "Heading", "Highlight", 
              "HorizontalLine", "Image", "ImageCaption", "ImageResize", "ImageStyle", "ImageToolbar", "ImageUpload", 
              "Indent", "IndentBlock", "Italic", "Link", "List", "MathType", "MediaEmbed", "MediaEmbedToolbar", 
              "PageBreak", "Paragraph", "PasteFromOffice", "RemoveFormat", "SpecialCharacters", 
              "Strikethrough", "Subscript", "Superscript", "Table", "TableCellProperties", "TableProperties", 
              "TableToolbar", "TextTransformation", "Underline"],
    removePlugins: ['Title'],
}