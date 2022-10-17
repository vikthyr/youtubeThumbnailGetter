async function pasteClipboard(){
    clipboardValue = await navigator.clipboard.readText();
    document.getElementById('linkInput').value = clipboardValue;
}