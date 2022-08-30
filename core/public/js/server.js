const deleteServer = async (id) => {
    await fetch(`${APP_URL}/servers/${id}` , {
        method: 'delete',
        headers: {
            'content-type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }).then(() => {
        location.reload()
    }).catch((e) => {
        console.log(e)
    })
}

