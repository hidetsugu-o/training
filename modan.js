const men = ['bob', 'john', 'dex'];

for (let i = 0; i < men.length; i++) {
    console.log(men[i]);
}

men.map((name) => console.log(name));

const two = men.filter((name) => name != 'john');
console.log(two);

const demo = (two) => console.log("demoだよ", two);
demo(two);