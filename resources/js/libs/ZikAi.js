import axios from 'axios';

async function getCompletion(prompt) {
    try {
        const response = await axios.post('/get-completion', { prompt });

        return response.data;
    } catch (error) {
        console.error('Error fetching completion:', error);
        throw new Error('Unable to fetch completion.');
    }
}

export { getCompletion };
