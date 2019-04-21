# cehives

#bootstrap install
- sudo npm install --global yarn
- yarn add sass-loader node-sass --dev
- yarn add bootstrap-sass --dev
- yarn add font-awesome --dev
- yarn run encore dev

# run translation command
```bash
bin/console translation:update --dump-messages --force ru
bin/console translation:update --force ru
```
# update database
```bash
 bin/console doctrine:schema:update --force

```