async function getData(route) {
    let response = await fetch(route);
    return await response.json();
}
