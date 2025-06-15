 // Nettoie le paramètre "success" de l'URL sans recharger la page
 if (history.replaceState) {
    const url = new URL(window.location);
    url.searchParams.delete('success');
    window.history.replaceState({}, '', url);
}