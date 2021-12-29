var uploader

window.addEventListener("load", () => {
    var uploadForm = document.querySelector("#gameUploadForm")
    var uploadFormGameTitle = uploadForm.querySelector("#gameTitle")
    var uploadFormSelect = uploadForm.querySelector(".upload-form_select")
    var uploadFormSubmit = uploadForm.querySelector(".upload-form_submit")
    var uploadFormFileName = uploadForm.querySelector(".upload-form_filename")
    var uploadFormProgress = uploadForm.querySelector(".upload-form_progress")

    uploader = new plupload.Uploader({
        runtimes: 'html5,html4',

        browse_button: uploadFormSelect,
        container: document.querySelector("#container"),

        url: "/upload.php",
        chunk_size: "3mb",
        max_retries: 3,
        multi_selection: false,

        filters: {
            mime_types: [
                {title : "Zip files", extensions : "zip"}
            ]
        },

        init: {
            PostInit: function() {
                uploadForm.onsubmit = function(e) {
                    e.preventDefault()
                    uploader.start()
                    return false
                }
            },
            FilesAdded: function(uploader, files) {
                if (uploader.files.length > 1) {
                    uploader.files = [files[0]]
                }

                uploadFormFileName.innerHTML = uploader.files[0].name
            },
            BeforeUpload: function(uploader, file) {
                console.log("starting upload")
                uploadFormSubmit.disabled = true

                uploader.setOption("multipart_params", {
                    "gameTitle": uploadFormGameTitle.value.trim()
                })
            },
            UploadProgress: function(uploader, file) {
                uploadFormProgress.innerHTML = file.percent + "%"
            },
            UploadComplete: function(uploader, file) {
                console.log("Upload complete")
                uploadFormSubmit.disabled = false
                document.location.reload(true)
            },
            Error: function(up, err) {
                console.log(err)
            }
        }
    })

    uploader.init()
})

