const helper = {
    // Get image url from storage
    getStorageUrl: function (storagePath) {
        let url = storagePath.replace("public", "storage");
        return url;
    },

    // Check if image
    isImage: function (fileName) {
        let images = ["png", "jpg", "jpeg", "gif"];
        let file = fileName.split(".");
        if (Array.isArray(file)) {
            let fileExt = file[file.length - 1];
            if (images.includes(fileExt)) {
                return true;
            }
        }
        return false;
    },
};
