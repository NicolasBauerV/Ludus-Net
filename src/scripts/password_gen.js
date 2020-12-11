export const passWordGen = () => {
    const letters = ['r', 'A', 'o', 'P', 'O', 'p', 'x', 'W', 'q', 'w', 'Y', 'u', 'R', 'b', 'z', 'M', 'Z', 'a', 'i', 'I',
        'e', 'E', 'U']
    const numbers = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0']
    const symbols = ['&', '@', '(', ')', '%', '*', '$', '£', '/', '+', '=', '?', ';', '§', '#', '!', '^']

    let concat = letters.join('') + numbers.join('') + symbols.join('')
    let total_password = ""

    for (let i = 0; i < concat.length; i++) {
        let rd_nb = Math.floor(Math.random() * concat.length)
        total_password += concat[rd_nb]
    }
    return total_password
}