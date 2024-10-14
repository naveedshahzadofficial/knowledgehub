export const useAssets = (fileName) => {
    return process.env.MIX_BASE_URL + `/new_assets/images/${fileName}`;
}
