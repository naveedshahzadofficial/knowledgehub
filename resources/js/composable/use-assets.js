export const useAssets = (fileName) => {
    return process.env.MIX_BASE_URL + `/v4/${fileName}`;
}
