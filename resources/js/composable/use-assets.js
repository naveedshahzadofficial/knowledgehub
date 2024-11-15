export const useAssets = (fileName) => {
    return process.env.MIX_BASE_URL + `/v3/${fileName}`;
}
