let cacheData = null;

export function fetchData() {
  if (cacheData) {
    return Promise.resolve(cacheData);
  }

  return fetch(window.location.origin + '/wp-json/my-data/v2/pricelist') // Используем относительный путь
    .then((response) => response.json())
    .then((data) => {
      cacheData = data;
      return data;
    })
    .catch((error) => {
      console.error("Failed to fetch pricelist:", error);
      return null;
    });
}