const textBold = (text) => {
    return text
        .replace(/\*\*(.*?)\*\*/g, '<b>$1</b>')
        .replace(/\(\*(\d+)%\*\)/g, '<b>($1%)</b>')
        .replace(/\n/g, '<br>');
};

const getCurrentFormattedDate = () => {
    return new Date()
        .toLocaleString('en-GB', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
        })
        .replace(',', '');
};

export { textBold, getCurrentFormattedDate };
