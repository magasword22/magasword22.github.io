


fetch('https://www.refuges.info/api/bbox?bbox=4.06519,46.899847,5.518767,48.031311&type_points=all&nb_points=all')
    .then(response => response.json())
    .then(data => {
  data.features.sort((a, b) => a.properties.nom.localeCompare(b.properties.nom));
        
        if (data.features && Array.isArray(data.features)) {
          
            console.log(data);

      
            const container = document.getElementById('data-container');
         
       
            const htmlContent = `
                
                <ol>
                    ${data.features.map(feature => `
                        <li>
                            ${feature.properties.nom}, 
                           ( ${feature.geometry.coordinates} ),
                             <a href="${feature.properties.lien}" target="_blank">${feature.properties.lien}</a>
                        </li>
                    `).join('')}
                </ol>
            `;

    
            container.innerHTML = htmlContent;
        } else {
            console.error('Les données de l\'API ne sont pas dans le format attendu.');
        }
    })
    .catch(error => console.error('Erreur lors de la requête API :', error));


